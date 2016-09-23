<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Проставляет галочки в чекбоксах для тех категорий, к которым относится материал на момент редактирования. Суть в том, что если у нас материал отнесен к категории articles, то он в любом случае имеет категорию section0. Если материал отнесен к категории html, то он может иметь категорию section0 или section1 (если html - единственная категория, либо если материал относится к одновременно к категориям articles и html)). Далее если материал имеет категорию php, то он может иметь категорию section0 или section1 или section2. И так далее...

function populate($material_id,$names,$section_name)
{
    switch($section_name)
    {
        case 'articles':

            for ($i=0;$i<1;$i++)
            {
                $cname = 'section'.$i;

                if ($names[$cname] == 'articles')
                {
                    echo 'checked';
                }
            }
            break;


        case 'html':

            for ($i=0;$i<2;$i++)
            {
                $cname = 'section'.$i;

                if ($names[$cname] == 'html')
                {
                    echo 'checked';
                }
            }
            break;


        case 'php':

            for ($i=0;$i<3;$i++)
            {
                $cname = 'section'.$i;

                if ($names[$cname] == 'php')
                {
                    echo 'checked';
                }
            }
            break;


        case 'css':

            for ($i=0;$i<4;$i++)
            {
                $cname = 'section'.$i;

                if ($names[$cname] == 'css')
                {
                    echo 'checked';
                }
            }
            break;


        case 'video':

            for ($i=0;$i<5;$i++)
            {
                $cname = 'section'.$i;

                if ($names[$cname] == 'video')
                {
                    echo 'checked';
                }
            }
            break;

    }
}