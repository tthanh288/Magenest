<?php

namespace Magenest\Movie\Model\Attribute\Backend;

class Avatar extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * @param \Magento\Framework\DataObject $object
     *
     * @return $this
     */
    public function beforeSave($object)
    {
        $attrCode = $this->getAttribute()->getAttributeCode();
        if ($attrCode == 'avatar') {
            if (!empty($_FILES[$attrCode]['tmpp_name'])) {
                $imageFile = @getimagesize($_FILES[$attrCode]['tmpp_name']);
                if ($imageFile === false) {
                    throw new \Magento\Framework\Exception\LocalizedException(
                        __('The avatar picture is not a valid image.')
                    );
                } else {
                    $valid_types = ['image/gif', 'image/jpeg', 'image/png'];
                    if (!in_array($imageFile['mime'], $valid_types)) {
                        throw new \Magento\Framework\Exception\LocalizedException(
                            __('The avatar picture is not a valid image.')
                        );
                    }
                }
            }
        }

        return parent::beforeSave($object);
    }
}
