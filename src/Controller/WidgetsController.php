<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class WidgetsController extends AppController
{
    public function view($id)
    {
        $widget = $this->getTableLocator()->get('Widgets');
        $widget = $widget->get($id);

        $this->set(['widget' => $widget]);
        $this->render();
    }

    public function index()
    {
        $widgets = $this->getTableLocator()->get('Widgets');
        $results = $widgets->find()->toArray();

        $this->set(['widgets' => $results]);
        $this->render();
    }

    public function add()
    {
        $this->render();
    }

public function create()
{
$validator = new Validator();
$validator
    ->requirePresence('name')
    ->notEmpty('name', 'Please fill this field')
    ->add('name', [
        'length' => [
            'rule' => ['minLength', 5],
            'message' => 'Names need to be at least 5 characters long',
        ]
    ])
    ->requirePresence('price')
    ->notEmpty('price', 'Please fill in the price.')
    ->integer('price')
    ->requirePresence('description')
    ->notEmpty('description', 'Please fill in the price.');

$errors = $validator->errors($this->request->getData());

if (empty($errors))
{
    $widgets = $this->getTableLocator()->get('Widgets');
    $widget = $widgets->newEntity();

    $widget->name = filter_var($this->request->getData('name'),
        FILTER_SANITIZE_STRING
    );
    $widget->price = filter_var($this->request->getData('price'),
        FILTER_SANITIZE_NUMBER_INT
    );
    $widget->description = filter_var($this->request->getData('description'),
        FILTER_SANITIZE_STRING
    );

    $widget->created = time();
    $widget->modified = time();

    if ($widgets->save($widget)) {
        return $this->redirect('/widgets/' . $widget->id);
    }
}

}
    
}