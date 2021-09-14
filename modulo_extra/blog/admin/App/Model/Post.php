<?php
use Livro\Database\Record;
use Livro\Database\Repository;
use Livro\Database\Criteria;

class Post extends Record
{
    const TABLENAME = 'post';
    
    public static function getbyTag($tag)
    {
        $rep = new Repository('Post');
        $cri = new Criteria;
        if (!empty($tag))
        {
            $cri->add('tag', '=', $tag);
        }
        return $rep->load($cri);
    }
}
