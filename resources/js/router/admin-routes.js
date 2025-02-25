
export const adminRoutes = [
  {
      path:"/admin",
      component:()=>getAdminPage("Dashboard"),
  }
];

const getAdminPage = (fileName) => import (`@/pages/admin/${fileName}.vue`);