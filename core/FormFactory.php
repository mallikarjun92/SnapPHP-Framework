<?php

namespace SnapPHP\Core;

use Symfony\Component\Form\Forms;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\RequestHandlerInterface;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;

class FormFactory
{
    private static ?FormFactoryInterface $factory = null;

    public static function getFactory(): FormFactoryInterface
    {
        if (self::$factory === null) {
            $csrfTokenManager = new CsrfTokenManager();
            $validator = Validation::createValidator();
            $requestHandler = new HttpFoundationRequestHandler();

            self::$factory = Forms::createFormFactoryBuilder()
                ->addExtension(new \Symfony\Component\Form\Extension\Validator\ValidatorExtension($validator))
                ->addExtension(new CsrfExtension($csrfTokenManager))
                ->setRequestHandler($requestHandler)
                ->getFormFactory();
        }
        return self::$factory;
    }
}
