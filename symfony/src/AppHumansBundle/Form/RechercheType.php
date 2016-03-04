<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 04/03/2016
 * Time: 14:27
 */

namespace AppHumansBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('recherche', 'text');
    }
}
