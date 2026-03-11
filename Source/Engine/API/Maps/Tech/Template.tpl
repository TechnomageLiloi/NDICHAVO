<style><?php echo file_get_contents(__DIR__ . '/Style.css'); ?></style>
<div id="application-diary-show" class="stylo">
    <?php $tech = $entity->getTech(); ?>

    <table style="text-align: left;">
        <?php foreach($tech as $key => $value): ?>
            <tr>
                <th><?php echo $key; ?></th>
                <td><?php echo $value; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>