<?php
/**
 * Venustheme
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Venustheme EULA that is bundled with
 * this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.venustheme.com/LICENSE-1.0.html
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade the extension
 * to newer versions in the future. If you wish to customize the extension
 * for your needs please refer to http://www.venustheme.com/ for more information
 *
 * @category   Ves
 * @package    Ves_Blog
 * @copyright  Copyright (c) 2014 Venustheme (http://www.venustheme.com/)
 * @license    http://www.venustheme.com/LICENSE-1.0.html
 */

/**
 * Ves Blog Extension
 *
 * @category   Ves
 * @package    Ves_Blog
 * @author     Venustheme Dev Team <venustheme@gmail.com>
 */
class Ves_Blog_Block_Adminhtml_Post_Exportgrid extends Mage_Adminhtml_Block_Widget_Grid {
    public function __construct() {

        parent::__construct();
        $this->setId('postGrid');
        $this->setDefaultSort('date_from');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);

    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('ves_blog/post')->getCollection();
        $resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        foreach ($collection as $_post) {
            $results = $query = '';
            $query = 'SELECT store_id FROM ' . $resource->getTableName('ves_blog/post_store').' WHERE post_id = '.$_post->getPostId();
            $results = $readConnection->fetchCol($query);
            $_post->setData('stores', implode('-', $results));
        }
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('post_id', array(
            'header'    => Mage::helper('ves_blog')->__('post_id'),
            'index'     => 'post_id',
            ));

        $this->addColumn('is_active', array(
            'header'    => Mage::helper('ves_blog')->__('is_active'),
            'index'     => 'is_active'
            ));

        $this->addColumn('title', array(
            'header'    => Mage::helper('ves_blog')->__('title'),
            'index'     => 'title'
            ));

        $this->addColumn('identifier', array(
            'header'    => Mage::helper('ves_blog')->__('identifier'),
            'index'     => 'identifier'
            ));

        $this->addColumn('description', array(
            'header'    => Mage::helper('ves_blog')->__('description'),
            'index'     => 'description'
            ));

        $this->addColumn('detail_content', array(
            'header'    => Mage::helper('ves_blog')->__('detail_content'),
            'index'     => 'detail_content'
            ));

        $this->addColumn('created', array(
            'header'    => Mage::helper('ves_blog')->__('created'),
            'index'     => 'created'
            ));

        $this->addColumn('updated', array(
            'header'    => Mage::helper('ves_blog')->__('updated'),
            'index'     => 'updated'
            ));

        $this->addColumn('user_id', array(
            'header'    => Mage::helper('ves_blog')->__('user_id'),
            'index'     => 'user_id'
            ));

        $this->addColumn('update_user', array(
            'header'    => Mage::helper('ves_blog')->__('update_user'),
            'index'     => 'update_user'
            ));

        $this->addColumn('meta_keywords', array(
            'header'    => Mage::helper('ves_blog')->__('meta_keywords'),
            'index'     => 'meta_keywords'
            ));

        $this->addColumn('meta_description', array(
            'header'    => Mage::helper('ves_blog')->__('meta_description'),
            'index'     => 'meta_description'
            ));

        $this->addColumn('position', array(
            'header'    => Mage::helper('ves_blog')->__('position'),
            'index'     => 'position'
            ));

        $this->addColumn('tags', array(
            'header'    => Mage::helper('ves_blog')->__('tags'),
            'index'     => 'tags'
            ));

        $this->addColumn('file', array(
            'header'    => Mage::helper('ves_blog')->__('file'),
            'index'     => 'file'
            ));

        $this->addColumn('category_id', array(
            'header'    => Mage::helper('ves_blog')->__('category_id'),
            'index'     => 'category_id'
            ));

        $this->addColumn('hits', array(
            'header'    => Mage::helper('ves_blog')->__('hits'),
            'index'     => 'hits'
            ));

        $this->addColumn('video_id', array(
            'header'    => Mage::helper('ves_blog')->__('video_id'),
            'index'     => 'video_id'
            ));

        $this->addColumn('video_type', array(
            'header'    => Mage::helper('ves_blog')->__('video_type'),
            'index'     => 'video_type'
            ));

        $this->addColumn('stores', array(
            'header'    => Mage::helper('ves_blog')->__('stores'),
            'index'     => 'stores'
            ));

        return parent::_prepareColumns();
    }

}