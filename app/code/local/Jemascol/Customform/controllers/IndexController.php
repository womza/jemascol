<?php 
class Jemascol_Customform_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction() { //this will display the form
        $this->loadLayout();
        $this->_initLayoutMessages('core/session'); //this will allow flash messages
        $this->renderLayout();
    }

    public function sendAction() { //handles the form submit
        $post = $this->getRequest()->getPost();
        //do something with the posted data
        $templateId = 1;    // Quejas y Reclamos
        $emailTemplate = Mage::getModel('core/email_template')->load($templateId);
        if (!empty($emailTemplate->getData())) {
            $translate = Mage::getSingleton('core/translate');
            $storeId = Mage::app()->getStore()->getId();
            $vars = array(
                'user_email' => $post['email'],
                'user_name' => $post['name'],
                'user_subject' => $post['subject'],
                'user_comment' => $post['comment'],
            );

            $sender = array(
                'name' => $post['name'],
                'email' => $post['email'],
            );
            //recepient
            $to_email = Mage::getStoreConfig('trans_email/ident_general/email');
            $to_name = Mage::getStoreConfig('trans_email/ident_general/name');
            
            Mage::getModel('core/email_template')
            ->sendTransactional($templateId, $sender, $to_email, $to_name, $vars, $storeId);
            $translate->setTranslateInline(true);
            Mage::getSingleton('core/session')->addSuccess($this->__('Su mensaje fue enviado'));
        } else {
            Mage::getSingleton('core/session')->addSuccess($this->__('Su mensaje no fue enviado, intente mas tarde'));
        }
        
        $this->_redirect('*/*');//will redirect to form page
    }
}