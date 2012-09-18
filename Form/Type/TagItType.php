<?php

namespace Pff\Bundle\TagItBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TagItType extends AbstractType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
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
}