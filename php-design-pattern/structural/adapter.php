<?php

// DocManager interface

interface DocManager
{
    public function authenticate($user, $pwd);
    public function getDocuments($folderId);
    public function getDocumentsByType($folderId, $type);
    public function getFolders($folderId=null);
    public function saveDocument($document);
}

// Writely

class Writely implements DocManager
{
    public function authenticate($user, $pwd)
    {
        // authenticat using Writely authentication scheme
    }

    public function getDocuments($folderId)
    {
        // get documents available in a folder
    }

    public function getDocumentsByType($folderId, $type)
    {
        // get documents of specific type from a folder
    }

    public function getFolders($folderId=null)
    {
        // get all folders under specific folder
    }

    public function saveDocument($document)
    {
        // save the document
    }
}

// Library GoogleDocs

class GoogleDocs
{
    public function authenticateByClientLogin()
    {
        // authenticate using Writely authentication scheme
    }

    public function setUser()
    {
        // set user
    }

    public function setPassword()
    {
        // set password
    }

    public function getAllDocuments()
    {
        // get documents available in a folder
    }

    public function getRecentDocuments()
    {
        // 
    }

    public function getDocument()
    {
        // 
    }
}

// Google Doc Adapter

class GoogleDocsAdapter implements DocManager
{
    private $manager;

    public function __construct()
    {
        $this->manager = new GoogleDocs();
    }

    public function authenticate($user, $pwd)
    {
        $this->manager->setUser($user);
        $this->manager->setPassword($pwd);
        $this->manager->authenticateByClientLogin();
    }

    public function getDocuments($folderId)
    {
        return $this->manager->getAllDocuments();
    }

    public function getDocumentsByType($folderId, $type)
    {
        
    }

    public function getFolders($folderId = null)
    {
        
    }

    public function saveDocument($document)
    {
        
    }
}