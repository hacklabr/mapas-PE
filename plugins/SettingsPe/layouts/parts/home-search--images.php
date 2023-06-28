<?php $this->applyTemplateHook("home-content--home-search-images", "before"); ?>
<div style="text-align:center">
    <?php $this->applyTemplateHook("home-content--home-search-images", "begin"); ?>
    <?php foreach ($config['home-banners'] as $banner) : ?>
        <div style="margin-bottom: 1em;">
            <a href="<?=$banner['url']?>">
                <img src="<?= $this->asset($banner['image'], false) ?>" alt="<?= $banner['alt'] ?>">
            </a>
        </div>
    <?php endforeach ?>
    <?php $this->applyTemplateHook("home-content--home-search-images", "end"); ?>
</div>
<?php $this->applyTemplateHook("home-content--home-search-images", "after"); ?>