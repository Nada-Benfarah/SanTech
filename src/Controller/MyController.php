<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends AbstractController
{
#[Route('admin/img', name: 'admin_img')]
public function adminImg(): BinaryFileResponse
{
 return $this->file('../public/img/admin.jpg', "", ResponseHeaderBag::DISPOSITION_INLINE);

}

    #[Route('super-admin/img', name: 'super_admin_img')]
    public function superAdminImg(): BinaryFileResponse
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'User tried to access a page without having the ROLE_SUPER_ADMIN');
        return $this->file('../public/img/super-admin.jpg', "", ResponseHeaderBag::DISPOSITION_INLINE);

    }
}