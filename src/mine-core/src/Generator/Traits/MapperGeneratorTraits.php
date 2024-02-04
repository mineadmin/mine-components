<?php
/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://gitee.com/xmo/MineAdmin
 */

declare(strict_types=1);

namespace Mine\Generator\Traits;

trait MapperGeneratorTraits
{
    /**
     * 获取搜索代码
     * @param $column
     * @return string
     */
    protected function getSearchCode($column): string
    {
        return match ($column['query_type']) {
            'neq'     => $this->getSearchPHPString($column['column_name'], '!=', $column['column_comment']),
            'gt'      => $this->getSearchPHPString($column['column_name'], '<', $column['column_comment']),
            'gte'     => $this->getSearchPHPString($column['column_name'], '<=', $column['column_comment']),
            'lt'      => $this->getSearchPHPString($column['column_name'], '>', $column['column_comment']),
            'lte'     => $this->getSearchPHPString($column['column_name'], '>=', $column['column_comment']),
            'like'    => $this->getSearchPHPString($column['column_name'], 'like', $column['column_comment']),
            'between' => $this->getSearchPHPString($column['column_name'], 'between', $column['column_comment']),
            'in'      => $this->getSearchPHPString($column['column_name'], 'in', $column['column_comment']),
            'notin'   => $this->getSearchPHPString($column['column_name'], 'notin', $column['column_comment']),
            default   => $this->getSearchPHPString($column['column_name'], '=', $column['column_comment']),
        };
    }

    /**
     * @param $name
     * @param $mark
     * @param $comment
     * @return string
     */
    protected function getSearchPHPString($name, $mark, $comment): string
    {
        return <<<PHP
            // {$comment}
            '{$name}' => '{$mark}',

PHP;
    } // 该方法结束位置
}