<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\Collection;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('field_name')
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
            ->add('remitente', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Email para que pueda responderte',
                    'required' => true,
                    'disabled' => false
                ],
                'constraints' => [
                    new NotBlank(array('message' => 'El email no puede estar vacío.')),
                    new Email(array('message' => 'Email inválido.')),
                ]
              ]
            )
            ->add('fechaDeNacimiento', DateType::class,[
                'constraints' => [
                    new NotBlank(array('message' => 'Introduzca una fecha')),
                    new Date(),
                ],
                'placeholder' => [
                    'year' => 'Año', 'month' => 'Mes', 'day' => 'Dia',
                ],
                'days' => range(5,31),
                'months' => range(3,12),
                'years' => range(1984,2019),
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
              ]
            )
            ->add('mensaje',TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Mensaje que quieres enviarme'
                ],
                'constraints' => [
                    new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                    new Length(array('min' => 5,'minMessage' => 'Mínimo 5 caracteres.')),
                ]
              ]
            )
             ->add('modalidad', ChoiceType::class, [
                'attr' => [
                    'placeholder' => 'Modalidad no puede estar vacío',
                    'required' => true,
                    'disabled' => false
                ],
                'constraints' => [
                    new NotBlank(array('message' => 'La Modalidad no puede estar vacía.')),
                ],
                'choices'  => [
                    '--Seleccione--' => '',
                    'Yes' => 'Opción Uno',
                    'No' => 'Opción Dos',
                ],
              ]
            )
              ->add('programa', ChoiceType::class, [
                'attr' => [
                    'placeholder' => 'Programa no puede estar vacío',
                    'required' => true,
                    'disabled' => false
                ],
                'constraints' => [
                    new NotBlank(array('message' => 'El Programa no puede estar vacío.')),
                ],
                'choices'  => [
                    '--Seleccione--' => '',
                    'Yes' => 'Opción Uno',
                    'No' => 'Opción Dos',
                ],
              ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

       /* $collectionConstraint = new Collection(array(
            'nombre' => array(
                new NotBlank(array('message' => 'El nombre no puede estar vacío.')),
                new Length(array('min' => 2))
            ),
            'remitente' => array(
                new NotBlank(array('message' => 'El email no puede estar vacío.')),
                new Email(array('message' => 'Email inválido.'))
            ),
            'mensaje' => array(
                new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                new Length(array('min' => 5))
            )
        ));*/


        $resolver->setDefaults(array(
            //'constraints' => $collectionConstraint
            'attr'=>array('novalidate'=>'novalidate')
        ));
    }
    public function getName()
    {
        return 'contacto';
    }
}
