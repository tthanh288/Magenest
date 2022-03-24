<?php
namespace Magenest\Movie\Block\Adminhtml\CustomerTab;

class View extends \Magento\Backend\Block\Template implements \Magento\Ui\Component\Layout\Tabs\TabInterface
{
    /**
     * Template
     *
     * @var string
     */
    protected $_template = 'tab/customer_view.phtml';
    protected $_customerSessionFactory;
    private $customerDataFactory;
    protected $customer;
    protected $dataObjectHelper;


    /**
     * View constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerFactory,
        \Magento\Customer\Model\SessionFactory $customerSessionFactory,
        \Magento\Customer\Api\Data\CustomerInterfaceFactory $customerDataFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,

        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->_customerFactory = $customerFactory;
        parent::__construct($context, $data);
        $this->_customerSessionFactory = $customerSessionFactory;
        $this->customerDataFactory = $customerDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @return string|null
     */


    public function getCustomerId()
    {
        return $this->_coreRegistry->registry(\Magento\Customer\Controller\RegistryConstants::CURRENT_CUSTOMER_ID);
    }

    public function getCustomer()
    {
        if (!$this->customer) {
            $this->customer = $this->customerDataFactory->create();
            $data = $this->_backendSession->getCustomerData();
            $this->dataObjectHelper->populateWithArray(
                $this->customer,
                $data['account'],
                \Magento\Customer\Api\Data\CustomerInterface::class
            );
        }
        return $this->customer;
    }

    public function getCustomerEmail(){
        return $this->getCustomer()->getEmail();
    }

    public function getCustomerName(){
        $fistName = $this->getCustomer()->getFirstname();
        $lastName = $this->getCustomer()->getLastname();

        $fullName = $fistName.' '.$lastName;
        return $fullName;
    }

    public function getFileUrl()
    {
        $customerMedia = $this->getBaseUrl() . 'pub/media/customer';
        $customer_attribute_value = $this->customer->getData('avatar');
        $filePath = $customerMedia . $customer_attribute_value;
        return $filePath;

    }





/**
 * Get customer collection
 */


    /**
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Custom Tab');
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Custom Tab');
    }

    /**
     * @return bool
     */
    public function canShowTab()
    {
        if ($this->getCustomerId() ) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isHidden()
    {
        if ($this->getCustomerId()) {
            return false;
        }
        return true;
    }

    /**
     * Tab class getter
     *
     * @return string
     */
    public function getTabClass()
    {
        return '';
    }

    /**
     * Return URL link to Tab content
     *
     * @return string
     */
    public function getTabUrl()
    {
        return '';
    }

    /**
     * Tab should be loaded trough Ajax call
     *
     * @return bool
     */
    public function isAjaxLoaded()
    {
        return false;
    }
}
