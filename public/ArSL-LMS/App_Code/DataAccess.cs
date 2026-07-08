using System;
using System.Data;
using System.Collections.Generic;
using System.Text;
//using System.Data.Odbc;
using System.Configuration;
using System.IO;

using MySql.Data;
using MySql.Data.MySqlClient;

/// <summary>
/// Summary description for DataAccess
/// </summary>
namespace Website.Data
{
    public sealed class DataAccess
    {

        private DataAccess()
        { }

        #region MySqlCONNECTION

        /// <summary>
        /// This method gets the connection string.
        /// </summary>
        /// <returns>Connection String</returns>
        public static string GetConnectionString()
        {
            try
            {
                string strReturnConnectionString = "";
                //strReturnConnectionString = "server=localhost;uid=root;database=saslcorpus;password=4321;";
                /* This code takes connection string from the web.config file.*/
                strReturnConnectionString = ConfigurationSettings.AppSettings["dbConnection"];
        
                return strReturnConnectionString;
            }
            catch (Exception Ex)
            {
                throw Ex;
            }
        }


        /// <summary>
        /// This method returns OdbcConnection object.
        /// </summary>
        /// <returns>OdbcConnection</returns>
        public static MySqlConnection GetConnection()
        {
            try
            {
                string strConnection;
                strConnection = GetConnectionString();
                MySqlConnection MYsqlConnection = new MySqlConnection(strConnection);
                return MYsqlConnection;
            }
            catch (Exception Ex)
            {
                throw Ex;
            }

        }

        #endregion


        #region EXECUTE DATASET

        /// <summary>
        /// This method returns the data in dataset form. 
        /// </summary>
        /// <param name="cmdType">Command type</param>
        /// <param name="cmdText">Command text</param>
        /// <returns>Data in the form of Dataset.</returns>
        /// <summary>
        public static DataSet ExecuteDataSet(CommandType cmdType, string CommandText)
        {
            try
            {
                DataSet dsData = new DataSet();
                MySqlDataAdapter myDataAdapter = new MySqlDataAdapter();
                MySqlCommand myCommand = new MySqlCommand();
                myCommand.Connection = GetConnection();
                myCommand.CommandType = cmdType;
                myCommand.CommandText = CommandText;
                myDataAdapter.SelectCommand = myCommand;
                myDataAdapter.Fill(dsData);
                myCommand.Connection.Close();
                return dsData;
            }
            catch (Exception Ex)
            {
                throw Ex;
            }
        }


        /// <summary>
        /// This method returns the data in dataset form. 
        /// </summary>
        /// <param name="cmdType">Command type</param>
        /// <param name="cmdText">Command text</param>
        /// <param name="odbcParams">OdbcParameters</param>
        /// <returns>Data in the form of Dataset.</returns>
        public static DataSet ExecuteDataSet(CommandType cmdType, string CommandText, MySqlParameter[] MYsqlParams)
        {
            try
            {
                DataSet dsData = new DataSet();
                MySqlDataAdapter myDataAdapter = new MySqlDataAdapter();
                MySqlCommand myCommand = new MySqlCommand();
                myCommand.Connection = GetConnection();
                myCommand.CommandType = cmdType;
                myCommand.CommandText = CommandText;

                for (int i = 0; i < MYsqlParams.Length; i++)
                {
                    myCommand.Parameters.Add(MYsqlParams[i]);
                }

                myDataAdapter.SelectCommand = myCommand;
                myDataAdapter.Fill(dsData);
                myCommand.Connection.Close();
                return dsData;
            }
            catch (Exception Ex)
            {
                throw Ex;
            }
        }

        #endregion


        #region EXECUTE SCALAR


        /// <summary>
        /// This method returns object typecast the object to int or string depending upon return type.
        /// </summary>
        /// <param name="cmdType">CommandType</param>
        /// <param name="CommandText">CommandText</param>
        /// <returns>Object</returns>
        public static object ExecuteScalar(CommandType cmdType, string CommandText)
        {
            object objValue;
            MySqlConnection MYsqlConnection = GetConnection();
            try
            {
                MySqlCommand myCommand = new MySqlCommand();
                myCommand.Connection = MYsqlConnection;
                myCommand.CommandType = cmdType;
                myCommand.CommandText = CommandText;
                MYsqlConnection.Open();
                objValue = myCommand.ExecuteScalar();
                MYsqlConnection.Close();
                return objValue;

            }
            catch (Exception Ex)
            {
                throw Ex;
            }
            finally
            {
                MYsqlConnection.Close();
            }

        }


        /// <summary>
        /// This method returns object typecast the object to int or string depending upon return type.
        /// </summary>
        /// <param name="cmdType">CommandType</param>
        /// <param name="CommandText">CommandText</param>
        /// <param name="odbcParams">OdbcParameter</param>
        /// <returns>Object</returns>
        public static object ExecuteScalar(CommandType cmdType, string CommandText, MySqlParameter[] MYsqlParams)
        {
            object objValue;
            MySqlConnection connection = GetConnection();
            try
            {
                MySqlCommand myCommand = new MySqlCommand();
                myCommand.Connection = connection;
                myCommand.CommandType = cmdType;
                myCommand.CommandText = CommandText;
                for (int i = 0; i < MYsqlParams.Length; i++)
                {
                    myCommand.Parameters.Add(MYsqlParams[i]);
                }
                connection.Open();
                objValue = myCommand.ExecuteScalar();
                connection.Close();
                return objValue;

            }
            catch (Exception Ex)
            {
                throw Ex;
            }
            finally
            {
                connection.Close();
            }

        }


        #endregion


        #region EXECUTE NONQUERY

        /// <summary>
        /// This methods returns no of rows affected.
        /// </summary>
        /// <param name="cmdType">CommandType</param>
        /// <param name="CommandText">CommandText</param>
        /// <returns></returns>
        public static int ExecuteNonQuery(CommandType cmdType, string CommandText)
        {
            int intRValue;
            MySqlConnection connection = GetConnection();
            try
            {
                MySqlCommand myCommand = new MySqlCommand();
                myCommand.Connection = connection;
                myCommand.CommandType = cmdType;
                myCommand.CommandText = CommandText;
                connection.Open();
                MySqlTransaction MYsqlTransaction = connection.BeginTransaction();
                intRValue = myCommand.ExecuteNonQuery();
                MYsqlTransaction.Commit();
                connection.Close();
                return intRValue;

            }
            catch (Exception Ex)
            {
                throw Ex;
            }
            finally
            {
                connection.Close();
            }

        }


        /// <summary>
        /// /// This methods returns no of rows affected.
        /// </summary>
        /// <param name="cmdType">CommandType</param>
        /// <param name="CommandText">CommandText</param>
        /// <param name="odbcParams">OdbcParameters</param>
        /// <returns></returns>
        public static int ExecuteNonQuery(CommandType cmdType, string CommandText, MySqlParameter[] MYsqlParams)
        {
            int intRValue;
            MySqlConnection MYsqlConnection = GetConnection();
            try
            {
                MySqlCommand myCommand = new MySqlCommand();
                myCommand.Connection = MYsqlConnection;
                myCommand.CommandType = cmdType;
                myCommand.CommandText = CommandText;
                for (int i = 0; i < MYsqlParams.Length; i++)
                {
                    myCommand.Parameters.Add(MYsqlParams[i]);
                }

                MYsqlConnection.Open();

                MySqlTransaction MYsqlTransaction = MYsqlConnection.BeginTransaction();
                intRValue = myCommand.ExecuteNonQuery();
                MYsqlTransaction.Commit();
                MYsqlConnection.Close();
                return intRValue;

            }
            catch (Exception Ex)
            {
                throw Ex;
            }
            finally
            {
                MYsqlConnection.Close();
            }

        }

        #endregion


        #region EXECUTE READER

        /// <summary>
        /// This method returns data in form of reader form.
        /// </summary>
        /// <param name="cmdType">Command Type</param>
        /// <param name="CommandText">Command Text</param>
        /// <returns></returns>
        public static MySqlDataReader ExecuteReader( CommandType cmdType, string CommandText)
        {
            MySqlConnection connection = GetConnection();
            try
            {
                MySqlDataReader dataReader;
                MySqlCommand myCommand = new MySqlCommand();
                myCommand.Connection = connection;
                myCommand.CommandType = cmdType;
                myCommand.CommandText = CommandText;
                connection.Open();
                dataReader = myCommand.ExecuteReader();
                connection.Close();
                return dataReader;

            }
            catch (Exception Ex)
            {
                throw Ex;
            }
        }



        /// <summary>
        /// This method returns data in form of reader form.
        /// </summary>
        /// <param name="cmdType">Command Type</param>
        /// <param name="CommandText">Command Text</param>
        /// <param name="odbcParams">OdbcParameters</param>
        /// <returns></returns>
        public static MySqlDataReader ExecuteReader(CommandType cmdType, string CommandText, MySqlParameter[] MYsqlParams)
        {
            MySqlConnection connection = GetConnection();
            try
            {
                MySqlDataReader dataReader;
                MySqlCommand myCommand = new MySqlCommand();
                myCommand.Connection = connection;
                myCommand.CommandType = cmdType;
                myCommand.CommandText = CommandText;

                for (int i = 0; i < MYsqlParams.Length; i++)
                {
                    myCommand.Parameters.Add(MYsqlParams[i]);
                }

                connection.Open();
                dataReader = myCommand.ExecuteReader();
                //connection.Close();
                return dataReader;

            }
            catch (Exception Ex)
            {
                throw Ex;
            }
        }

        #endregion
    }
}