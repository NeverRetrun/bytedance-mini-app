<?php declare(strict_types=1);

namespace Tests\Encrypt;

use Tests\TestCase;

class MobileTest extends TestCase
{
    public function encryptMobileProvider(): array
    {
        return [
            [
                'd/hvGO4/DSgAbTbhRqjaCg==',
                'ypnU21rXdI82udph/DNs9w==',
                'X0gz84Ng7txhQQrsvSmo+Spaox2eU4zyo+CNhQQM4bg/izyzrMtl4+/P3QC1I8VgYjU9fwkv80QwISV3DiiMJPxGG46jjlmFu11OX3ztVAEh7yn0YO8gXbcU+b2naZgeRbSNRTRiJLrC7UfcKh5OhhNpXLo7euZi18SXMyhfvTk5eEBmq9SH/oIeezsBBYkfx9ulqu+HN5kW3f/bUgAhUN3OBaeR16SvuR90fU7sGro/yx0vm/VyQFzb6jH8orURg73iVQDAS+X2kt6hvaCQwAThckSzse4+buFj8Sj+1PI0s27sjPrpD33kwuFRboGEurdcvODnubw0MUPZ9dxy+6PRu2hxhZmcRTsNd3rNdVsv3kGU7lJK1KT7p7NZF/eIn1CMwDo8WUP9pojS+Q7hoP+HW0UWcUB1qqfHfK+qHo1/ZSKHe2wfyD+5EMNKWLfJ3psQrm/9uMKadlzd1vk3/nYM9830wSSPo7i668T1DBk='
            ],
        ];
    }


    /**
     * @dataProvider encryptMobileProvider
     */
    public function testEncryptMobile(string $sessionKey, string $iv, string $encrypted): void
    {
        $this->markTestSkipped('not have encrypt mobile data');

        $response = $this->app->encrypt->mobile($sessionKey, $iv, $encrypted);

        $this->assertNotEmpty($response->phoneNumber);
        $this->assertNotEmpty($response->purePhoneNumber);
    }
}