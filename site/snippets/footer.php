
                <!-- info à propos / contacts -->
                <section class="contacts">
                    <h2>Informations</h2>
                    <?php $contacts = page("contacts") ?>
                    <?= $contacts->text()->kt() ?>        
                </section>

                <!-- infos équipe -->
                <section class="team">
                    <p>
                        <?php foreach ($contacts->team()->toStructure() as $member):?>
                        <span><?= $member->name() ?></span>
                        <?php endforeach ?>
                    </p>
                </section>
                
            </main>
        </div>
        
        <?php // trop de javascript… ?>
        <?= js("assets/plyr/plyr.min.js") ?>
        <?= js("assets/js/imagesloaded.pkgd.min.js") ?>
        <?= js("assets/js/flickity.pkgd.min.js") ?>
        <?= js("assets/js/bmap.js") ?>
        <?= js("assets/js/nm.js") ?>
	</body>
</html>