<?php


namespace Infrastructure\Persistence\Repositories;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Domain\Entities\Product;
use Domain\Interfaces\Repositories\ProductRepositoryInterface;

class ProductRepository extends EntityRepository implements ProductRepositoryInterface
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, new ClassMetadata(Product::class));
    }


    public function index($page, $size): array
    {
        // get entity manager
        $em = $this->getEntityManager();

        // get the user repository
        $developers = $em->getRepository(Product::class);

        // build the query for the doctrine paginator
        $query = $developers->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->getQuery();

        // load doctrine Paginator
        $paginator = new \Doctrine\ORM\Tools\Pagination\Paginator($query);

        // you can get total items
        $totalItems = count($paginator);

        // get total pages
        $pagesCount = ceil($totalItems / $size);

        // now get one page's items:
        $paginator
            ->getQuery()
            ->setFirstResult($size * ($page-1)) // set the offset
            ->setMaxResults($size); // set the limit

        $productList = [];

        foreach ($paginator as $item) {
            array_push($productList, $item);
        }

        return $productList;
    }

    /**
     * @param Product $product
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function persist(Product $product): void
    {
        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush();
    }

    /**
     * @param int $id
     * @return Product|object|null
     */
    public function findById(int $id)
    {
        return $this->findOneBy(['id' => $id]);
    }
}
