<?php

use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\Text;
use Livro\Widgets\Wrapper\FormWrapper;

class ContatoForm extends Page
{
    private $form;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->form = new FormWrapper(new Form('form_contato'));
        $this->form->setTitle('Formulário de contato');
        
        $nome = new Entry('nome');
        $email= new Entry('email');
        $assunto= new Combo('assunto');
        $mensagem = new Text('mensagem');
        
        $this->form->addField('Nome', $nome);
        $this->form->addField('Email', $email);
        $this->form->addField('Assunto', $assunto);
        $this->form->addField('Mensagem', $mensagem);
        
        $assunto->addItems( [ '1' => 'Sugestão',
                              '2' => 'Reclamação',
                              '3' => 'Suporte',
                              '4' => 'Cobrança',
                              '5' => 'Outros' ] );
        $mensagem->setSize(300, 80);
        
        $this->form->addAction( 'Enviar', new Action([$this, 'onSend']));
        
        parent::add($this->form);
    }
    
    public function onSend($params)
    {
        try
        {
            $data = $this->form->getData();
            
            $this->form->setData($data);
            
            if (empty($data->email))
            {
                throw new Exception('Email vazio');
            }
            
            if (empty($data->assunto))
            {
                throw new Exception('Assunto vazio');
            }
            
            $mensagem = "Nome: {$data->nome} <br>";
            $mensagem.= "Email: {$data->email} <br>";
            $mensagem.= "Assunto: {$data->assunto} <br>";
            $mensagem.= "Mensagem: {$data->mensagem} <br>";
            
            new Message('info', $mensagem);
        }
        catch (Exception $e)
        {
            new Message('error', $e->getMessage());
        }
    }
    
    public function onLoad()
    {
        $data = new stdClass;
        $data->assunto = 1;
        $data->mensagem = 'Escreva aqui...';
        
        $this->form->setData($data);
    }
}
