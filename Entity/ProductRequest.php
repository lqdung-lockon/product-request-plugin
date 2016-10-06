<?php
/*
* This file is part of EC-CUBE
*
* Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
* http://www.lockon.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Plugin\ProductRequest\Entity;

use Eccube\Entity\AbstractEntity;
use Eccube\Entity\Customer;
use Eccube\Entity\Product;
use Eccube\Entity\ProductClass;

/**
 * Class ProductRequest
 * @package Plugin\ProductRequest\Entity
 */
class ProductRequest extends AbstractEntity
{
    /**
    * @var integer
    */
    private $id;

    /**
    * @var string
    */
    private $name01;

    /**
     * @var string
     */
    private $name02;

    /**
    * @var string
    */
    private $email;

    /**
     * @var integer
     */
    private $quantity;

    /**
    * @var \DateTime
    */
    private $requestDate;

    /**
     * @var \DateTime
     */
    private $commitDate;

    /**
    * @var integer
    */
    private $delFlg;

    /**
    * @var \DateTime
    */
    private $createDate;

    /**
    * @var \DateTime
    */
    private $updateDate;

    /**
     * @var Customer
     */
    private $Customer;

    /**
     * @var Product
     */
    private $Product;

    /**
     * @var ProductClass
     */
    private $ProductClass;

    /**
    * Get id
    *
    * @return integer
    */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Id
     *
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name01
     *
     * @return $this
     */
    public function setName01($name01)
    {
        $this->name01 = $name01;

        return $this;
    }

    /**
    * Get name 01
    *
    * @return string
    */
    public function getName01()
    {
        return $this->name01;
    }

    /**
     * @param string $name02
     *
     * @return $this
     */
    public function setName02($name02)
    {
        $this->name02 = $name02;

        return $this;
    }

    /**
     * Get name 02
     *
     * @return string
     */
    public function getName02()
    {
        return $this->name02;
    }

    /**
    * Set email
    *
    * @param  string $email
    * @return $this
    */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
    * Get quantity
    *
    * @return string
    */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
    * Set quantity
    *
    * @param string $quantity
    * @return $this
    */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
    * Get request date
    *
    * @return \DateTime
    */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
    * Set request date
    *
    * @param \DateTime $requestDate
    * @return $this
    */
    public function setRequestDate(\DateTime $requestDate)
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    /**
    * Get commit date
    *
    * @return \DateTime
    */
    public function getCommitDate()
    {
        return $this->commitDate;
    }

    /**
    * Set commit date
    *
    * @param \DateTime $commitDate
    * @return $this
    */
    public function setCommitDate(\DateTime $commitDate)
    {
        $this->commitDate = $commitDate;

        return $this;
    }

    /**
    * Set del_flg
    *
    * @param integer $delFlg
    * @return $this
    */
    public function setDelFlg($delFlg)
    {
        $this->delFlg = $delFlg;

        return $this;
    }

    /**
    * Get del_flg
    *
    * @return integer
    */
    public function getDelFlg()
    {
        return $this->delFlg;
    }

    /**
    * Set create_date
    *
    * @param \DateTime $createDate
    * @return $this
    */
    public function setCreateDate(\DateTime $createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
    * Get create_date
    *
    * @return \DateTime
    */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
    * Set update_date
    *
    * @param \DateTime $updateDate
    * @return $this
    */
    public function setUpdateDate(\DateTime $updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
    * Get update_date
    *
    * @return \DateTime
    */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
    * Set customer
    *
    * @param Customer $customer
    * @return $this
    */
    public function setCustomer(Customer $customer = null)
    {
        $this->Customer = $customer;

        return $this;
    }

    /**
    * Get Customer
    *
    * @return Customer
    */
    public function getCustomer()
    {
        return $this->Customer;
    }

    /**
     * @param Product|null $product
     * @return $this
     */
    public function setProduct(Product $product = null)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->Product;
    }

    /**
     * @param ProductClass|null $productClass
     * @return $this
     */
    public function setProductClass(ProductClass $productClass = null)
    {
        $this->ProductClass = $productClass;

        return $this;
    }

    /**
     * @return ProductClass
     */
    public function getProductClass()
    {
        return $this->ProductClass;
    }
}
