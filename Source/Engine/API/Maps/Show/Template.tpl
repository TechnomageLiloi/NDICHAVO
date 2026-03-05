<style><?php echo file_get_contents(__DIR__ . '/Style.css'); ?></style>
<div id="application-diary-show" class="stylo">
    <h1 style="text-align: center;"><?php echo $entity->getId(); ?> <?php echo $entity->getTitle(); ?></h1>
    <hr/>
    <?php echo $entity->parseBody(); ?>
</div>