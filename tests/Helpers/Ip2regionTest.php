<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */

namespace Mine\Tests\Helpers;

use Mine\Helper\Ip2region;

beforeEach(function () {
    $this->mock = new Ip2region();
});
test('search', function () {
    $result = $this->mock->search('114.114.114.114');
    expect($result)->toBeString();
});
