<?php

namespace App\Controllers;

use App\Models\Model_Upload;
use CodeIgniter\Files\File;

class Upload extends BaseController
{
    protected $Model_Upload;

    public function __construct()
    {
        helper('form');
        $this->Model_Upload =  new Model_Upload();
    }

    public function index()
    {
        $data = array(
            'title' => 'upload',
            'data' => $this->Model_Upload->get_upload(),
            'isi' => 'upload',
        );
        return view('User/upload', $data);
    }

    public function do_upload()
    {
        $validationRule = [
            'submission' => [
                'label' => 'Image File',
                'rules' => 'uploaded[submission]'
                    . '|mime_in[submission,image/jpg,image/jpeg,image/png,pdf]'
                    . '|max_size[submission,2048]',
            ],
        ];
        
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return view('User/upload', $data);
        }

        $file = $this->request->getFile('submission');

        if (! $file->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $file->store();
            $data = ['uploaded_flleinfo' => new File($filepath)];
            return view('upload_success', $data);
        } else {
            $data = ['errors' => 'The file has already been moved.'];
            return view('User/upload', $data);
        }
    }

    public function submit_submission()
    {
        if ($this->validate([
            'score' => [
                'label' => 'score',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} required'
                ]
            ],
            'submission' => [
                'label' => 'submission',
                'rules' => 'uploaded[submission]'
                    . '|ext_in[submission,jpg,jpeg,png,pdf]'
                    . '|max_size[submission,2048]',
                'errors' => [
                    'uploaded' => '{field} not uploaded',
                    'ext_in' => '{field} must be jpg, jpeg, png, or pdf',
                    'max_size' => '{field} not valid (max size: 2048kb)',
                ]
            ],
        ])) {

            $file = $this->request->getFile('submission');

            if (! $file->hasMoved()) {
                $filepath = WRITEPATH . 'uploads/' . $file->store();
                $data = array(
                    'score' => $this->request->getPost('score'),
                    'periode' => $this->request->getPost('periode'),
                    'category' => $this->request->getPost('category'),
                    'submission' => $filepath
                );
                $this->Model_Upload->save_submission($data);

                session()->setFlashdata('pesan', 'Upload Success');
                return redirect()->to(base_url('Upload/index'));
            } else {
                session()->setFlashdata('pesan', 'Upload error, please try again');
                return redirect()->to(base_url('Upload/index'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Upload/index'));
        }
    }
}
