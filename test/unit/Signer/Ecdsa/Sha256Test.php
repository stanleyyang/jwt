<?php
/**
 * This file is part of Lcobucci\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

declare(strict_types=1);

namespace Lcobucci\JWT\Signer\Ecdsa;

/**
 * @author Luís Otávio Cobucci Oblonczyk <lcobucci@gmail.com>
 * @since 2.1.0
 */
class Sha256Test extends BaseTestCase
{
    /**
     * @test
     *
     * @covers Lcobucci\JWT\Signer\Ecdsa::create
     * @covers Lcobucci\JWT\Signer\Ecdsa::__construct
     *
     * @uses Lcobucci\JWT\Signer\Ecdsa\EccAdapter
     * @uses Lcobucci\JWT\Signer\Ecdsa\KeyParser
     * @uses Lcobucci\JWT\Signer\Ecdsa\SignatureSerializer
     */
    public function createShouldReturnAValidInstance()
    {
        $this->assertInstanceOf(Sha256::class, Sha256::create());
    }

    /**
     * @test
     *
     * @uses Lcobucci\JWT\Signer\Ecdsa
     *
     * @covers Lcobucci\JWT\Signer\Ecdsa\Sha256::getAlgorithmId
     */
    public function getAlgorithmIdMustBeCorrect()
    {
        $this->assertEquals('ES256', $this->getSigner()->getAlgorithmId());
    }

    /**
     * @test
     *
     * @uses Lcobucci\JWT\Signer\Ecdsa
     *
     * @covers Lcobucci\JWT\Signer\Ecdsa\Sha256::getAlgorithm
     */
    public function getAlgorithmMustBeCorrect()
    {
        $this->assertEquals('sha256', $this->getSigner()->getAlgorithm());
    }

    private function getSigner(): Sha256
    {
        return new Sha256($this->adapter, $this->keyParser);
    }
}
