<?php

namespace MyClass\Test;

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\equalTo;

class ProductServiceMockTest extends TestCase {

  private ProductRepository $repository;
  private ProductService $service;

  protected function setUp(): void {
    // Mock adalah improvement dari stub, ini bisa mengetahui brapa kali methodnya dipanggil
    $this->repository = $this->createMock(ProductRepository::class);
    $this->service = new ProductService($this->repository);
  }

  public function testStub() {
    $product = new Product();
    $product->setId("1");

    $this->repository->method("findById")->willReturn($product);

    $result = $this->repository->findById("1");
    self::assertSame($product, $result);
  }

  public function testStubMap() {
    $product1 = new Product();
    $product1->setId("1");

    $product2 = new Product();
    $product2->setId("2");

    $map = [
      ["1", $product1],
      ["2", $product2],
    ];

    $this->repository->method("findById")->willReturnMap($map);

    self::assertSame($product1, $this->repository->findById("1"));
    self::assertSame($product2, $this->repository->findById("2"));
  }

  public function testStubCallback() {
    $this->repository->method("findById")
    ->willReturnCallback(function (string $id) {
      $product = new Product();
      $product->setId($id);
      return $product;
    });

    self::assertEquals("1", $this->repository->findById("1")->getId());
    self::assertEquals("2", $this->repository->findById("2")->getId());
    self::assertEquals("3", $this->repository->findById("3")->getId());
  }

  public function testRegisterSuccess() {
    $this->repository->method("findById")->willReturn(null);
    $this->repository->method("save")->willReturnArgument(0);

    $product = new Product();
    $product->setId("1");
    $product->setName("Contoh");

    $result = $this->service->register($product);

    self::assertEquals($product->getId(), $product->getId());
    self::assertEquals($product->getName(), $product->getName());
  }

  public function testRegisterException() {
    $this->expectException(\Exception::class);
    $productInDB = new Product();
    $productInDB->setId("1");

    $this->repository->method("findById")->willReturn($productInDB);

    $product = new Product();
    $product->setId("1");

    $this->service->register($product);
  }

  public function testDeleteSuccess() {
    $product = new Product();
    $product->setId("1");

    $this->repository->expects(self::once())
    ->method("delete")->with(self::equalTo($product));

    $this->repository->expects(self::once())->method("findById")
    ->willReturn($product)->with(self::equalTo("1"));

    $this->service->delete("1");
    self::assertTrue(true, "Success delete");
  }

  public function testDeleteException() {
    $this->repository->expects(self::never())
    ->method("delete");

    $this->expectException(\Exception::class);
    $this->repository->expects(self::once())->method("findById")
    ->with(equalTo("1"))->willReturn(null);

    $this->service->delete("1");
  }

  public function testMock() {
    $product = new Product;
    $product->setId("1");

    $this->repository->expects(self::once())
    ->method("findById")->willReturn($product);

    $result = $this->repository->findById("1");
    self::assertSame($product, $result);
  }
}