<?php

namespace App\Form;

use App\Entity\Choix;
use App\Entity\Simple;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouterInterface;

class SimpleType extends AbstractType
{
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('choix', ChoiceType::class, [
                'autocomplete' => true,
                'attr' => [
                    'data-controller' => 'custom-autocomplete',
                ],
                'autocomplete_url' => $this->router->generate('app_address_autocomplete'),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Simple::class,
        ]);
    }
}
