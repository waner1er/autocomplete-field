<?php
// src/Form/Type/PostalAddressType.php
namespace App\Form\Type;

use App\Entity\Choix;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Routing\RouterInterface;

class ChoixAutocompleteType extends AbstractType
{
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('choix', ChoiceType::class, [
                'autocomplete' => true,
                'attr' => [
                    'data-controller' => 'autocomplete',
                    'data-action' => 'input->autocomplete#toggle',
                ],
                'autocomplete_url' => $this->router->generate('app_address_autocomplete'),
            ])
            ->add('street', TextType::class)
            ->add('postcode', TextType::class)
            ->add('city', TextType::class);
    }
}
