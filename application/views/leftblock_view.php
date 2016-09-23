<div id="leftblock">
    <table>

        <tr>
            <td class="tdview">
                <h2 class = "sidebartitle">Свежие материалы</h2>
            </td>
        </tr>

        <tr>
            <td>
                <?php foreach ($latest_materials as $item):?>

                    <p><a href = "<?=base_url()."materials/$item[material_id]";?>"><?=$item['title'];?></a></p>

                <?php endforeach;?>
            </td>
        </tr>

    </table>
</div>