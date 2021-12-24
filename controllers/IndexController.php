<?php

class IndexController  extends BaseController
{
    public $name = 'index';

    public function indexAction() {

        return new Response($this->render('form'));

    }

    public function createAction(Request $request)
    {
        if ($request->isPost() && !empty($request->getRequestParameter('application'))) {

            $application= $request->getRequestParameter('application');
            $articleValidator = new ArticleValidator();

            $errors = $articleValidator->validate($application);

            if (empty($errors)) {

            } else {

                return new Response (
                    $this->render('form', [
                        'errors' => $errors
                    ])
                );
            }
        }
    }
}
