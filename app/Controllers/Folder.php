<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Folder as EntitiesFolder;
use App\Models\FolderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;

class Folder extends BaseController
{
    protected $model;
    
    use ResponseTrait;
    public function __construct(){

        $this->model = new FolderModel();
    }

    public function index()
    {
        //
    }
    
    public function addFolder()
    {
        $data = [
            'contractor' => $this->request->getVar('contractor'),
            'recipient'  => $this->request->getVar('recipient'),
            'name'       => $this->request->getVar('name'),
            'status'     => $this->request->getVar('status'),
            'created_by' => $this->request->getVar('createdBy'),
            'updated_by' => $this->request->getVar('updatedBy'),
        ];
        $newFolder = new EntitiesFolder($data);
 
        $save = $this->model->save($newFolder);
        if($save) return $this->respondCreated($save);
        else return 'Une erreur est survenue';
        
    }

    public function updateFolder(){
        
        $folderId = $this->request->getVar('id');

        $folder = $this->model->find($folderId);

        if($folder){

            $folder->contractor = $this->request->getVar('contractor');
            $folder->recipient  = $this->request->getVar('recipient');
            $folder->name       = $this->request->getVar('name');
            $folder->status     = $this->request->getVar('status');
            $folder->updated_by = $this->request->getVar('updatedBy');
            
            $this->model->save($folder);
            return $this->respondCreated($folder);
        }
        else{
            echo "Le dossier n'existe pas";
        }        
    }

    public function deleteFolder(){

        $folderId = $this->request->getVar('id');

        $folder = $this->model->find($folderId);

        if($folder){              
            // return $this->respondCreated($folder);          
            if($this->model->delete($folder->id))  
            echo "Le dossier a été supprimé avec succès !";                        
        }
        else{
            echo "Le dossier n'existe pas";
        }        
    }
}
