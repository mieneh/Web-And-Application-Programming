using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.SqlClient;
using System.Configuration;
using StudentResultManagement1.Models;
using System.Data;
using System.Web.WebPages;

namespace StudentResultManagement1.DAL
{
    public class Product_DAL
    {
        string con = "Data Source=QYN\\MAYAO;Initial Catalog=webDemoASP;Integrated Security=True";
        public List<Product> GETALLPRODUCT()
        {
            List<Product> productList = new List<Product>();
            using (SqlConnection conn = new SqlConnection(con))
            {
                SqlCommand command = conn.CreateCommand();
                command.CommandType = System.Data.CommandType.StoredProcedure;
                command.CommandText = "GETALLPRODUCT"; 
                SqlDataAdapter adapter = new SqlDataAdapter(command);
                DataTable dtProducts = new DataTable();

                conn.Open();
                adapter.Fill(dtProducts);
                conn.Close();

                foreach (DataRow dr in dtProducts.Rows)
                {
                    productList.Add(new Product
                    {
                        productID = Convert.ToInt32(dr["PRODUCTID"]),
                        productName = dr["PRODUCTNAME"].ToString(),
                        price = Convert.ToDouble(dr["PRICE"]),
                        qty = Convert.ToInt32(dr["QTY"]),
                        remarks = dr["REMARKS"].ToString()
                    });
                }
            }
            return productList;
        }
        public bool INSERTPRODUCT(Product product)
        {
            int id = 0;
            using (SqlConnection conn= new SqlConnection(con))
            {
                SqlCommand command = new SqlCommand("INSERTPRODUCT", conn);
                command.CommandType = CommandType.StoredProcedure;
                command.Parameters.AddWithValue("@PRODUCTNAME", product.productName);
                command.Parameters.AddWithValue("@PRICE", product.price);
                command.Parameters.AddWithValue("@QTY", product.qty);
                command.Parameters.AddWithValue("@REMARKS", product.remarks);
                conn.Open ();
                id = command.ExecuteNonQuery();
                conn.Close ();
            }
            if(id>0)
            {
                return true;
            }
            else { 
                return false; 
            }
        }
        public List<Product> GETPRODUCTBYID(int ProductID)
        {
            List<Product> productList = new List<Product>();
            using (SqlConnection conn = new SqlConnection(con))
            {
                SqlCommand command = conn.CreateCommand();
                command.CommandType = CommandType.StoredProcedure;
                command.CommandText = "GETPRODUCTBYID";
                command.Parameters.AddWithValue("@PRODUCTID", ProductID);
                SqlDataAdapter adapter = new SqlDataAdapter(command);
                DataTable dtProducts = new DataTable();

                conn.Open();
                adapter.Fill(dtProducts);
                conn.Close();

                foreach (DataRow dr in dtProducts.Rows)
                {
                    productList.Add(new Product
                    {
                        productID = Convert.ToInt32(dr["PRODUCTID"]),
                        productName = dr["PRODUCTNAME"].ToString(),
                        price = Convert.ToDouble(dr["PRICE"]),
                        qty = Convert.ToInt32(dr["QTY"]),
                        remarks = dr["REMARKS"].ToString()
                    });
                }
            }
            return productList;
        }
        public bool UPDATEPRODUCT(Product product)
        {
            int i = 0;
            using (SqlConnection conn = new SqlConnection(con))
            {
                SqlCommand command = new SqlCommand("UPDATEPRODUCT", conn);
                command.CommandType = CommandType.StoredProcedure;
                command.Parameters.AddWithValue("@PRODUCTID", product.productID);
                command.Parameters.AddWithValue("@PRODUCTNAME", product.productName);
                command.Parameters.AddWithValue("@PRICE", product.price);
                command.Parameters.AddWithValue("@QTY", product.qty);
                command.Parameters.AddWithValue("@REMARKS", product.remarks);
                conn.Open();
                i = command.ExecuteNonQuery();
                conn.Close();
            }
            if (i > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public string DELETEPRODUCT (int productID)
        {
            string result = "";
            using (SqlConnection conn = new SqlConnection (con))
            {
                SqlCommand command = new SqlCommand("DELETEPRODUCT", conn);
                command.CommandType = CommandType.StoredProcedure;
                command.Parameters.AddWithValue("@PRODUCTID", productID);
                command.Parameters.Add("@OUTPUTMESSAGE", SqlDbType.VarChar, 50).Direction = ParameterDirection.Output;

                conn.Open();
                command.ExecuteNonQuery ();
                result = command.Parameters["@OUTPUTMESSAGE"].Value.ToString();
                conn.Close();
            }
            return result;
        }
    }

}