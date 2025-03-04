
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
        }
      ]
  },
  
];

const getAdminPage = (fileName) => import (`@/pages/admin/${fileName}.vue`);