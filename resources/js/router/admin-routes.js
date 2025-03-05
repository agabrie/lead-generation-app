
export const adminRoutes = [
  {
      path:"/admin",
      children:[
        {
          path:"",
          component:()=>getAdminPage("Dashboard"),
        },
        {
          path:"login",
          component:()=>getAdminPage("Login"),
        },
        {
          path:"lead/:id",
          component:()=>getAdminPage("Lead"),
        }
      ]
  },
  
];

const getAdminPage = (fileName) => import (`@/pages/admin/${fileName}.vue`);