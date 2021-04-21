USE [RAMEX]
GO

/****** Object:  Table [dbo].[Ramassage_Agence]    Script Date: 28/12/2020 10:58:59 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Ramassage_Agence](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[code_ram] [varchar](50) NULL,
	[agence_cod] [char](7) NOT NULL
) ON [PRIMARY]
GO
