<div id="rightblock">
    <table>
        <tr>
            <td class="tdview">
                <h2 class = "sidebartitle">Популярное</h2>
            </td>
        </tr>
        <tr>
            <td>
                <?php foreach ($popular_materials as $item):?>

                    <p><a href = "<?=base_url()."materials/$item[material_id]";?>"><?=$item['title'];?></a></p>

                <?php endforeach;?>
            </td>
        </tr>
    </table>
</div>