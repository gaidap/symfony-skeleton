<?php
    
    namespace App\Controller;
    
    use App\Entity\User;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class UserController extends AbstractController {
        /**
         * @Route("/user", name="user")
         */
        public function index(): Response {
            $em = $this->getDoctrine()->getManager();
            $conn = $em->getConnection();
            
            $sql = '
                SELECT * FROM "user" u
                WHERE u.id = :id
            ';
            
            $stmt = $conn->prepare($sql);
            $stmt->execute(['id' => 4]);
            
            $user = $stmt->fetchAll();
            
            return $this->render('user/index.html.twig', [
                'controller_name' => 'UserController',
                'user' => $user[0]
            ]);
        }
        
        /**
         * @Route("/createUser", name="createUser")
         */
        public function createUser(): Response {
            $em = $this->getDoctrine()->getManager();
            $newUser = new User();
            $newUser->setName('Peter');
            $em->persist($newUser);
            $em->flush();
            dump('New user was created with id of' . $newUser->getId());
            return $this->render('user/index.html.twig', [
                'controller_name' => 'UserController',
            ]);
        }
    }
