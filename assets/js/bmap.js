
var bmapize = function(selector) {

    // canvas support
    var elem = document.createElement('canvas');
    if (!(elem.getContext && elem.getContext('2d'))){
		return false;
    } 
    
	var grays = 256;
    var treshold = new Array();
    
	for (var i = 0; i < grays; i++) {
		treshold.push(i < (grays >> 1) ? 0 : grays - 1);		
	}

	self.grayscale = function(image, mode) {
		var i;
		image.gray = new Array(image.width * image.height);
		for (var i = 0; i < image.gray.length; i++) {
			// Luminosity:
			image.gray[i] = parseInt(
				(0.2126 * image.data[i << 2]) +
				(0.4152 * image.data[(i << 2) + 1]) +
				(0.0722 * image.data[(i << 2) + 2]), 10
			);
		}
	}

	self.spread = function(image, mode) {
        var p;
        var level = mode == 'black' ? 255 : 0;
        for (var i = 0; i < image.data.length; i += 4) { 
            p = image.gray[i >> 2];
            image.data[i] = level; 
            image.data[i + 1] = level; 
            image.data[i + 2] = level; 
            image.data[i + 3] = p; 			
        }
    }

	self.turn_atkinson = function(el, mode) {
	

		var width = el.offsetWidth;
		var height = el.offsetHeight;
		
		var canvas = document.createElement('canvas');
		canvas.width=width;
		canvas.height=height;
		canvas.className='overcanvas';
		el.parentNode.insertBefore(canvas, el);
		
		var ctx = canvas.getContext('2d');
		ctx.drawImage(el, 0, 0, width, height);
		var data = ctx.getImageData(0, 0, width, height);
		
		self.grayscale(data, mode);

		for (var y = 0; y < data.height; y++) {
			for (var x = 0; x < data.width; x++) {
				var i = (y * data.width) + x;
				gray_old = data.gray[i];
				gray_new = treshold[gray_old];
				gray_err = (gray_old - gray_new) >> 3;
				data.gray[i] = gray_new;
				var NEAR = [
					[x+1, y], [x+2, y], [x-1, y+1], [x, y+1], [x+1, y+1], [x, y+2]
				];
				var near_x = 0;
				var near_y = 0;
				for (var n = 0; n < NEAR.length; n++) {
					near_x = NEAR[n][0];
					near_y = NEAR[n][1];
					if (near_x >= 0) {
						if (near_x <= width) {
							if (near_y >= 0) {
								if (near_y <= height) {
									data.gray[
										((near_y * data.width) + near_x)
									] += gray_err;
								}
							}
						}
					}
				}
			}
		}
		self.spread(data, mode);
		ctx.putImageData(data, 0, 0);
		
	}
	
	self.run = function() {
        
        var bmaps = document.querySelectorAll('.bmap img');
        for (i = 0; i < bmaps.length; ++i) {

			var bmap = bmaps[i];
			 
			if(bmap.parentElement.classList.contains("invert")){
				self.turn_atkinson(bmap, 'black');
			}else {
				self.turn_atkinson(bmap, 'white');
			}
			
		
		}            
        
    }
	self.run();
};