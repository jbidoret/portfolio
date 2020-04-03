<?php

return [
  
  # Debug avec un message signifiant
  'debug'  => true,
  
  # Presets pour les images responsives
  # Voir ici : https://developer.mozilla.org/en-US/docs/Learn/HTML/Multimedia_and_embedding/Responsive_images
  # et pour Kirby, là : https://getkirby.com/docs/reference/objects/file/srcset
  'thumbs' => [
    'srcsets' => [
      'cover' => [800, 1024, 2048],
      'thumb' => [
        '300w' => [
          'width' => 300,
          'height' => 170,
          'crop' => 'center'
        ],
        '800w' => [
          'width' => 800,
          'height' => 450,
          'crop' => 'center'
        ],
        '1024w' => [
          'width' => 1024,
          'height' => 576,
          'crop' => 'center'
        ],
        '1536w' => [
          'width' => 1536,
          'height' => 864,
          'crop' => 'center'
        ]
      ]
    ]
  ]


];