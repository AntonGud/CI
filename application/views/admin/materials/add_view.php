<div id="wrapper">
    <div id="content">

        <p><strong>Добавить новый материал</strong></p>

        <?=get_tinymce();?>

        <form action = "<?=base_url();?>materials/add" method="post">

            <p>Название материала<br>
                <input type="text" name="title" value="<?=set_value('title');?>"><br>
                <strong><?=form_error('title');?></strong>
            </p>

            <p>Мета-описание материала<br>
                <input type="text" name="description" value="<?=set_value('description');?>"><br>
                <strong><?=form_error('description');?></strong>
            </p>

            <p>Ключевые слова<br>
                <input type="text" name="keywords" value="<?=set_value('keywords');?>"><br>
                <strong><?=form_error('keywords');?></strong>
            </p>

            <p>Путь к мини иконке<br>
                <input type="text" name="small_img_url" value="<?=set_value('small_img_url');?>"><br>
                <strong><?=form_error('small_img_url');?></strong>
            </p>

            <p>Краткое описание<br>
                <textarea name="short_text" cols="75" rows="7"><?=set_value('short_text');?></textarea><br><a href="javascript:setup();">Использовать TinyMCE</a><br>
                <strong><?=form_error('short_text');?></strong>
            </p>

            <p>Полный текст<br>
                <textarea name="main_text" cols="75" rows="20"><?=set_value('main_text');?></textarea><br><a href="javascript:setup();">Использовать TinyMCE</a><br>
                <strong><?=form_error('main_text');?></strong>
            </p>

            <p>Автор материала<br>
                <input type="text" name="author" value="<?=set_value('author');?>"><br>
                <strong><?=form_error('author');?></strong>
            </p>

            <p>Категория материала<br>
                <input type = "checkbox" name = "section[]" value = "articles" <?=set_checkbox('section[]','articles')?>>Статьи<br>
                <input type = "checkbox" name = "section[]" value = "html" <?=set_checkbox('section[]','html')?>>HTML<br>
                <input type = "checkbox" name = "section[]" value = "php" <?=set_checkbox('section[]','php')?>>PHP<br>
                <input type = "checkbox" name = "section[]" value = "css" <?=set_checkbox('section[]','css')?>>CSS<br>
                <input type = "checkbox" name = "section[]" value = "video" <?=set_checkbox('section[]','video')?>>VIDEO<br>

                <strong><?=form_error('section[]');?></strong>
            </p>

            <p><input type = "submit" name = "add_button" value = "Добавить материал"></p>

        </form>

        <p><a href="#top">Наверх</a></p>

    </div>
</div>