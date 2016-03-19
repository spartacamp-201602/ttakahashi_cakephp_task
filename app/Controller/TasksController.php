<?php

class TasksController extends AppController
{
 // public $scaffold;
    public $components =array('Flash');
    public $helpers = array('Html','Form');
    public function index()
    {
        $options =array(
            'conditions'=>array(
                'Task.status'=>0
                )
            );


        $tasks = $this->Task->find('all',$options);

        $this->set('tasks',$tasks);
    }

    public function done($id)
    {
        // idをセット
        $this->Task->id = $id;

        // 単一のレコードの更新
        $this->Task->saveField('status',1);

        // フラッシュメッセージ
        $msg = sprintf('タスク %s を完了しました',$id);
        $this->Flash->success($msg);

        $this->redirect(array('action'=>'index'));

    }

    public function create()
    {
        if($this->request->is('post'))//POSTメソッドのチェック
        {
            if($this->Task->save($this->request->data))//送られてきたデータを保存
            {
                $this->Flash->success('タスク'.$this->Task->id.'を登録しました');

                $this->redirect(array('action'=>'index'));
            }

        else
            {
                $this->Flash->error('登録できませんでした');
            }
        }





    }








}