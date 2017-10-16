<?php

namespace AppBundle\Block;

use Symfony\Component\HttpFoundation\Response;


use Sonata\AdminBundle\Form\FormMapper;
// use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\CoreBundle\Validator\ErrorElement;

 use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BaseBlockService;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MyBlockService extends BaseBlockService
{
    public function getName()
    {
        return 'My Newsletter';
    }

    public function getDefaultSettings()
    {
        return array();
    }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
    }

    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        /*
        // merge settings
        $settings = array_merge($this->getDefaultSettings(), $block->getSettings());

        return $this->renderResponse('AppBundle:Block:MyBlock.html.twig', array(
            'block'     => $block,
            // 'settings'  => $settings
            ), $response);
         * 
         */
        
        return $this->renderResponse($blockContext->getTemplate(), array(
                'block'     => $blockContext->getBlock(),
                'settings'  => $blockContext->getSettings()
             ), $response);
    }
    
   
    public function configureSettings(OptionsResolver $resolver)
         {
            
            $resolver->setDefaults(array(
                'url'      => false,
                'title'    => 'Welcome to My Site',
                'template' => 'AppBundle:Block:MyBlock.html.twig',
                'data'    => array('a'=>'aa','b'=>'bb'),
           ));
         }
}