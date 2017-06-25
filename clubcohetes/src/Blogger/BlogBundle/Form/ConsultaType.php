<?php 
// src/Blogger/BlogBundle/Form/ConsultaType.php

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ConsultaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array('label'  => 'Tu nombre'));
        $builder->add('email', EmailType::class, array('label' => 'Correo', 'required' => true));
        $builder->add('asunto', TextType::class, array('label' => 'Tema', 'required' => true));
        $builder->add('cuerpo', TextareaType::class, array('label' => 'Mensaje', 'required' => true));
        $builder->add('guardar', SubmitType::class, array('label' => 'Enviar'));
    }

    public function getNombre()
    {
        return 'contacto';
    }
}