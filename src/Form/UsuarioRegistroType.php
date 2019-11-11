<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\Collection;

class UsuarioRegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add('nombre',TextType::class, [
                'constraints' => [
                    new NotBlank(array('message' => 'El nombre no puede estar vacío.')),
                    new Length(array('min' => 2,'minMessage' => 'Mínimo 2 caracteres.')),
                ],
                'attr' => [
                    'placeholder' => 'Nombre del Alumno'
                ],
              ]
            )
             ->add('apellidoPaterno',TextType::class, [
                'constraints' => [
                    new NotBlank(array('message' => 'El napellido paterno no puede estar vacío.')),
                    new Length(array('min' => 2,'minMessage' => 'Mínimo 2 caracteres.')),
                ],
                'attr' => [
                    'placeholder' => 'Nombre del Alumno'
                ],
              ]
            )
             ->add('apellidoMaterno',TextType::class, [
                'constraints' => [
                    new NotBlank(array('message' => 'El apellido materno no puede estar vacío.')),
                    new Length(array('min' => 2,'minMessage' => 'Mínimo 2 caracteres.')),
                ],
                'attr' => [
                    'placeholder' => 'Nombre del Alumno'
                ],
              ]
            )
            ->add('correo', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Email',
                    'required' => true,
                    'disabled' => false
                ],
                'constraints' => [
                    new NotBlank(array('message' => 'El email no puede estar vacío.')),
                    new Email(array('message' => 'Email inválido.')),
                ]
              ]
            )
            ->add('nombreUsuario',TextType::class, [
                'constraints' => [
                    new NotBlank(array('message' => 'El nombre de usuario es obligatorio')),
                    new Length(array('min' => 2,'minMessage' => 'Mínimo 2 caracteres.')),
                ],
                'attr' => [
                    'placeholder' => 'Nombre de usuario'
                ],
              ]
            )
            ->add('rol', ChoiceType::class, [
                'attr' => [
                    'placeholder' => 'Rol',
                    'required' => true,
                    'disabled' => false
                ],
                'constraints' => [
                    new NotBlank(array('message' => 'El Rol no puede estar vacío.')),
                ],
                'choices'  => [
                    '--Seleccione--' => '',
                    'ADMINISTRADOR' => 'ADMIN',
                    'USUARIO' => 'USER',
                ],
              ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'attr'=>array('novalidate'=>'novalidate')
        ]);
    }
}
