<?php
namespace app\index\controller;

use app\index\model\TodoList;
use think\controller;
use think\Request;

class Index extends controller
{
    /**
     * 首页列表
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $is_delete = $request->get('isDelete');
        if ($is_delete == '1') {
            $data = TodoList::onlyTrashed()
                ->order('delete_time DESC')
                ->select();
        } else {
            $data = TodoList::order('create_time DESC')
                ->limit(20)
                ->select();
        }

        $this->assign('data', $data);
        return $this->fetch('index');
    }

    /**
     * 添加item
     *
     * @param Request $request
     * @return void
     */
    public function addItem(Request $request)
    {
        $content = $request->post('content');
        $res = TodoList::create([
            'content' => $content
        ]);
        $this->redirect('/index');
    }

    /**
     * 删除item
     *
     * @param Request $request
     * @return void
     */
    public function deleteItem(Request $request)
    {
        $id =  $request->get('id');
        $item = TodoList::get($id);
        $item->delete();
        $this->redirect('/index');
    }

    /**
     * 编辑item
     *
     * @param Request $request
     * @return void
     */
    public function editItem(Request $request)
    {
        if ($request->isGet()) {
            $id =  $request->param('id');

            $item = TodoList::get($id);

            $this->assign('item', $item);
            return $this->fetch('edit');
        } else {
            $id =  $request->post('id');
            $content =  $request->post('content');

            $item = TodoList::get($id);
            $item->content = $content;
            $item->save();

            return $this->redirect('/editItem', ['id' => $id]);
        }
    }

    /**
     * 查看环境配置
     *
     * @return void
     */
    public function envInfo()
    {
        dump(config());
    }
}
