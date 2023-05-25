<?php

namespace App\Service;

use App\Model\Blogs;

class BlogsService
{

    public static function list($param)
    {
        $query = Blogs::query()->where(['status' => 1]);

        if (!empty($param['author']))
            $query->where('author', 'like', '%' . $param['author'] . '%');

        if (!empty($param['summary']))
            $query->where('summary', 'like', '%' . $param['summary'] . '%');

        if (!empty($param['updated_start']))
            $query->where('updated_at', '>=', $param['updated_start']);

        if (!empty($param['updated_end']))
            $query->where('updated_at', '<=', $param['updated_end']);

        $total = $query->count();

        $offset = ($param['page'] - 1) * $param['pageSize'];

        if ($param['pageSize'] > 0)
            $query->offset($offset)->limit($param['pageSize']);

        $list = $query->orderByDesc('updated_at')->orderByDesc('id')->get();

        return ['total' => $total, 'list' => $list];
    }

    public static function create($param)
    {
        try {
            $blogs = new Blogs();

            $blogs->author = $param['author'] ?? '';
            $blogs->summary = $param['summary'] ?? '';
            $blogs->image = $param['image'] ?? '';
            $blogs->content = $param['content'] ?? '';

            return $blogs->save();
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function store($param)
    {
        if (empty($param['id']))
            return self::create($param);

        try {
            Blogs::query()->where(['id' => $param['id']])->update([
                'author' => $param['author'] ?? '',
                'summary' => $param['summary'] ?? '',
                'image' => $param['image'] ?? '',
                'content' => $param['content'] ?? '',
            ]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function destroy($param)
    {
        try {
            Blogs::query()->where(['id' => $param['id'] ?? 0])->update([
                'status' => 2,
            ]);

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    public static function upload(\Illuminate\Http\UploadedFile $file)
    {
        try {
            $filename = substr($file->getClientOriginalName(), 0, strrpos($file->getClientOriginalName(), '.'));
            $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
            $filename = $filename . '_' . str_replace('.', '', microtime(true)) . '.' . $extension;

            $file->move(public_path('images'), $filename);

            return $filename;
        } catch (\Exception $e) {
            return 'default.png';
        }
    }
}
