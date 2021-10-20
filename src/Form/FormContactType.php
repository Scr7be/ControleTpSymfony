<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormContactType extends AbstractType
{
    /**
     * Permet d'avoir la configuration de base d'un champ !
     *
     * @param string  $label
     * @param string $placeholder
     * @return array
     */
    private function getConfiguration($label, $placeholder){
        return [
            'label' => $label,
            'attr' => [
                    'placeholder' => $placeholder
            ]
            ];
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Nom', TextType::class, $this->getConfiguration("Nom", "Tapez votre nom"))
        ->add('Prenom', TextType::class, $this->getConfiguration("Prenom", "Tapez votre prenom"))
        ->add('Adresse', TextType::class,$this->getConfiguration("Prix ", "Tapez votre adresse"))
        ->add('avatar', UrlType::class, $this->getConfiguration("avatar du contact", "Collez votre url d'avatar"))
        ->add('codepostal', TextType::class,$this->getConfiguration("Code Postal ", "Tapez votre code postal"))
        ->add('ville', TextType::class,$this->getConfiguration("Ville ", "Tapez votre ville"))
        ->add('numtelephone', TextType::class,$this->getConfiguration("Numéro téléphone ", "Tapez votre numéro de téléphone"))
        ->add('adrmail', TextType::class,$this->getConfiguration("Adresse mail", "Tapez votre adresse mail"))
        ->add('categorie', EntityType::class, [
            'class' => Categorie::class,
            'choice_label' => 'designation',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
