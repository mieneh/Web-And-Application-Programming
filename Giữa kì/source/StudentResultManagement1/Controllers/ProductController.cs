using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using StudentResultManagement1.DAL;
using StudentResultManagement1.Models;
namespace StudentResultManagement1.Controllers
{
    public class ProductController : Controller
    {
        // GET: Product
        Product_DAL productDAL = new Product_DAL();
        public ActionResult Index()
        {
            var producList = productDAL.GETALLPRODUCT();
            if(producList.Count == 0)
            {
                TempData["InfoMessage"] = "Currently products not available in the Database.";
            }
            return View(producList);
        }

        // GET: Product/Details/5
        public ActionResult Details(int id)
        {
            try
            {
                var product = productDAL.GETPRODUCTBYID(id).FirstOrDefault();
                if (product == null)
                {
                    TempData["InfoMessage"] = "Product not available with ID " + id.ToString();
                    return RedirectToAction("index");
                }
                return View(product);
            }
            catch(Exception e)
            {
                TempData["ErrorMessage"] = e.Message;
                return View();
            }
        }

        // GET: Product/Create
        [HttpGet]
        public ActionResult Create()
        {
            return View();
        }

        // POST: Product/Create
        [HttpPost]
        public ActionResult Create(Product product)
        {
            try
            {
                // TODO: Add insert logic here
                bool IsInserted ;
                if(ModelState.IsValid)
                {
                    IsInserted =  productDAL.INSERTPRODUCT(product);
                    if (IsInserted)
                    {
                        TempData["SuccessMessage"] = "Product details saved successfully!";
                    }
                    else
                    {
                        TempData["ErrorMessage"] = "Product is already available/ Unable to save the product details!";
                    }
                    return RedirectToAction("index");

                }
                return View();
            }
            catch (Exception e)
            {
                TempData["ErrorMessage"] = e.Message;
                return View();
            }
        }

        // GET: Product/Edit/5
        public ActionResult Edit(int id)
        {
            var product = productDAL.GETPRODUCTBYID(id).FirstOrDefault();
            if(product == null) 
                {
                    TempData["InfoMessage"] = "Product not available with ID " + id.ToString();
                return RedirectToAction("index");
                }
            return View(product);
        }

        // POST: Product/Edit/5
        [HttpPost, ActionName("Edit")]
        public ActionResult UpdateProduct(Product product)
        {
            try
            {
                if(ModelState.IsValid)
                {
                    bool IsUpdated = productDAL.UPDATEPRODUCT(product);
                    if (IsUpdated)
                    {
                        TempData["SuccessMessage"] = "Product details updated successfully!";
                    }
                    else
                    {
                        TempData["ErrorMessage"] = "Product is already available/ Unable to update the product details!";
                    }
                }
                // TODO: Add update logic here

                return RedirectToAction("index");
            }
            catch
            {
                return View();
            }
        }

        // GET: Product/Delete/5
        public ActionResult Delete(int id)
        {
            try
            {
                var product = productDAL.GETPRODUCTBYID(id).FirstOrDefault();
                if (product == null)
                {
                    TempData["InfoMessage"] = "Product not available with ID " + id.ToString();
                    return RedirectToAction("index");
                }
                return View(product);
            }
            catch(Exception ex)
            {
                TempData["ErrorMessage"] = ex.Message;
                return View();
            }
        }

        // POST: Product/Delete/5
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmation(int id)
        {
            try
            {
                // TODO: Add delete logic here
                string result = productDAL.DELETEPRODUCT(id);
                if (result.Contains("deleted"))
                {
                    TempData["SuccessMessage"] = result;
                }
                else
                {
                    TempData["ErrorMessage"] = result;
                }
                return RedirectToAction("index");
            }
            catch(Exception ex ) 
            {
                TempData["ErrorMessage"] = ex.Message;
                return View();
            }
        }
    }
}
