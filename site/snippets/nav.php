
  <nav class="projects-nav">
    <?php foreach(page('projets')->children()->listed() as $project): ?>
      <span>
        <a class="<?php e($project->isOpen(), 'active') ?>" href="<?= $project->url() ?>"><?= $project->title() ?></a>
      </span>      
    <?php endforeach ?>
  </nav>

  <nav class="about-nav">
    <?php $aboutpage = page('a-propos'); ?>
    <span>
      <a class="<?php e($aboutpage->isOpen(), 'active') ?>" href="<?= $aboutpage->url() ?>"><?= $aboutpage->title() ?></a>
    </span>      
  </nav>