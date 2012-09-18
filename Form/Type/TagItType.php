<?php

namespace Pff\Bundle\TagItBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormValidatorInterface;

class TagItType extends AbstractType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'tag_limit' => 10
        ));
        $resolver->setRequired(array(
            'data_path'
        ));
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'tagit';
    }
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['data_path'] = $options['data_path'];
        $view->vars['tag_limit'] = $options['tag_limit'];
    }
}