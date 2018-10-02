<?php if(!$site->home_image()->empty()): ?>
  <a href="<?= url() ?>" class="home-image" alt="<?= $site->title()->html() ?>">
    <?= $site->home_image()->toFile() ?>
  </a>
<?php endif ?>

<nav id="main">
  <ul>
    <?php foreach($pages->visible() as $item): ?>
    <li class="menu-item<?= r($item->isOpen(), ' is-active') ?>">
      <a href="<?= $item->url() ?>">
        <?= $item->title()->html() ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
