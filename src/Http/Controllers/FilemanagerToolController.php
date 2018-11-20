<?php

namespace WebId\Filemanager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WebId\Filemanager\Http\Services\FileManagerService;

class FilemanagerToolController extends Controller
{
    /**
     * @var mixed
     */
    protected $service;

    /**
     * @param FileManagerService $filemanagerService
     */
    public function __construct(FileManagerService $filemanagerService)
    {
        $this->service = $filemanagerService;
    }

    /**
     * @param Request $request
     */
    public function getData(Request $request)
    {
        return $this->service->ajaxGetFilesAndFolders($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function getSearchData(Request $request)
    {
        return $this->service->ajaxSearchFromAllFilesAndFolders($request->search);
    }

    /**
     * @param Request $request
     */
    public function createFolder(Request $request)
    {
        return $this->service->createFolderOnPath($request->folder, $request->current);
    }

    /**
     * @param Request $request
     */
    public function deleteFolder(Request $request)
    {
        return $this->service->deleteDirectory($request->current);
    }

    /**
     * @param Request $request
     */
    public function upload(Request $request)
    {
        return $this->service->uploadFile($request->file, $request->current);
    }

    /**
     * @param Request $request
     */
    public function getInfo(Request $request)
    {
        return $this->service->getFileInfo($request->file);
    }

    /**
     * @param Request $request
     */
    public function removeFile(Request $request)
    {
        return $this->service->removeFile($request->file);
    }
}
