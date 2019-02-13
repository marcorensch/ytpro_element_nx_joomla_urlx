<?php

$el = $this->el('div', [

    'class' => [
        'example-element'
    ]

]);

$model = JModelLegacy::getInstance('Article', 'ContentModel', array('ignore_request'=>true));
$articleID = JFactory::getApplication()->input->get('id');
$appParams = JFactory::getApplication()->getParams();
$model->setState('params', $appParams);
$article = $model->getItem($articleID);

$articleUrls = json_decode($article->urls, true);
$url = $articleUrls[$props['urlselect']];
$label = $articleUrls[$props['urlselect'].'text'];
if(empty($props['altlabel'])){
    $label = $articleUrls[$props['urlselect'].'text'];
}else{
    $label = $props['altlabel'];
};

$linkstyles = $props['linkstyle'];
if($props['button_size'] !== '' && strpos($props['linkstyle'], 'uk-button') !== false){
    $linkstyles .= ' uk-button-'.$props['button_size'];
}

?>

<?= $el($props, $attrs) ?>

    <?php // render node title field by using $props['title'] ?>

    <?php // render node select field by using $props['select'] ?>

    <div class="<?= $props['containerclasses'] ?>">
        <a class="<?= $linkstyles ?> <?= $props['linkclasses'] ?>" href="<?= $url ?>" target="<?= $props['linktarget'] ?>" title="<?= $label ?>"><?= $label ?></a>
    </div>

</div>
